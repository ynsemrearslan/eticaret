<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <h3 class="title">Makale Ekle</h3>
          <form @submit.prevent="addArticle" class="mb-3">
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Başlık" v-model="article.title"/>
              </div>
              <div class="form-group">
                  <textarea class="form-control" placeholder="Açıklama" v-model="article.body"></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Kaydet</button>
          </form>
      </div>
      <div class="col-md-6">
        <h3 class="title">Toplam Makale</h3>
        <p class="count">{{ articles.length }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4" v-for="article in articles" v-bind:key="article.id">
        <div class="card card-body article">
            <h4>{{ article.title }}</h4>
            <p>{{ article.body }}</p>
            <hr>
            <button @click="editArticle(article)" class="btn btn-warning mb-2">Düzenle</button>
            <button @click="deleteArticle(article.id)" class="btn btn-danger">Sil</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      data() {
        return {
          articles: [],
          article: {
            id: '',
            title: '',
            body: ''
          },
          article_id: '',
          edit: false
        }
      },

      created() {
        this.fetchArticles();
      },

      methods: {
        fetchArticles() {
          fetch('/api/articles')
            .then(res => res.json())
            .then (res => {
                this.articles = res;
            })
            .catch(err => console.log(err));
        },
        addArticle() {
          if (this.edit === false) {
            fetch('api/article', {
              method: 'post',
              body: JSON.stringify(this.article),
              headers: {
                'content-type': 'application/json'
              }
            })
              .then(res => res.json())
              .then(data => {
                this.article.title = '';
                this.article.body = '';
                alert('Makale eklendi.');
                this.fetchArticles();
              })
          } else {
            fetch('api/article', {
              method: 'put',
              body: JSON.stringify(this.article),
              headers: {
                'content-type': 'application/json'
              }
            })
              .then(res => res.json())
              .then(data => {
                this.article.title = '';
                this.article.body = '';
                alert('Makale düzenlendi.');
                this.fetchArticles();
              })
          }
        },
        editArticle(article) {
          this.edit = true;
          this.article.id = article.id;
          this.article.article_id = article.id;
          this.article.title = article.title;
          this.article.body = article.body;
        },
        deleteArticle(id) {
          if (confirm('Makaleyi silmek istediğinize emin misiniz?')) {
            fetch(`api/article/${id}`, {
              method: 'delete'
            })
            .then(res => res.json())
            .then(data => {
                alert('Makale silindi.');
                this.fetchArticles();
            })
          }
        }
      }
    }
</script>
