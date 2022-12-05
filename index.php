<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dischi JSON</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- VueJs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
    <div id="app">
        <header>
            <div class="container d-flex justify-content-between">
                <div class="logo">
                    <img src="./assets/img/logo-small.svg" alt="Logo Spotify">
                </div>
                <div>
                    <button @click="isNew = !isNew" class="btn bg-primary">ADD NEW ALBUM</button>
                </div>
                <div class="filter-genre">
                    <button v-if="showFilters" class="btn bg-primary" @click="getGenre()"> Show Filters </button>
                    <a v-if="isRefresh" class="btn bg-primary" href="index.php">Show All</a>
                    <ul>
                        <li v-for="(album,index) in genreAlbums" :key="index">
                            <a @click="getByFilter(album)" href="#">{{album}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <main>
            <div class="container position-relative">
                <div class="row row-cols-3 my-4">
                    <div  @click="getDescription(index)" v-for="(album, index) in albums" :key="index" class="col my-5">
                        <div class="mf-card w-100">
                            <div class="top w-100 text-center">
                                <img :src="album.poster" :alt="album.title">
                            </div>
                            <div class="bottom text-center">
                                <div class="content-bottom">
                                    <h2>
                                        {{album.title}}
                                    </h2>
                                    <h5>
                                        {{album.author}}
                                    </h5>
                                    <h6>
                                        {{album.year}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="isOver" class="overlayer">
                        <div @click="close()" class="close">
                            <i class="fa-solid fa-x"></i>
                        </div>
                        <div v-for="(album, index) in description" :key="index" class="content-over">
                            <div class="mf-over-card w-100">
                                <div class="top w-100 text-center">
                                    <img :src="album.poster" :alt="album.title">
                                </div>
                                <div class="bottom text-center">
                                    <div class="content-bottom">
                                        <h2>
                                            {{album.author}}
                                        </h2>
                                        <h5>
                                            {{album.genre}}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>  
                <div v-if="isNew" class="add-new-album">
                    <div>
                        <label for="name-album" class="form-label">Inserisci il titolo dell'Album</label>
                        <input v-model.trim="addTitle" type="text" class="form-control" id="name-album">
                    </div>
                    <div>
                        <label for="name-author" class="form-label">Inserisci il nome dell'autore</label>
                        <input v-model.trim="addAuthor" type="text" class="form-control" id="name-author">
                    </div>
                    <div>
                        <label for="name-year" class="form-label">Inserisci l'anno di produzione</label>
                        <input v-model.trim="addYear" type="number" class="form-control" id="name-year">
                    </div>
                    <div>
                        <label for="name-url" class="form-label">Inserisci l'url dell'immagine</label>
                        <input v-model.trim="addImg" type="text" class="form-control" id="name-url">
                    </div>
                    <div>
                        <label for="name-genre" class="form-label">Inserisci il Genere</label>
                        <input v-model.trim="addGenre" type="text" class="form-control" id="name-genre">
                    </div>
                    <div class="d-flex justify-content-center my-5">
                        <button @click="addNewAlbum()"  class="btn bg-primary"> ADD ALBUM</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="./assets/js/main.js"></script>
</body>
</html>