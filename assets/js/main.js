const { createApp } = Vue;

createApp({
    data(){
        return {
            apiUrl: 'server.php',
            albums: [],
            description: [],
            isOver: false
        }
    },
    methods: {
        getAlbums(){
            axios.get(this.apiUrl)
                .then(result => {
                    this.albums = result.data;
                })
        },
        getDescription(index){
            this.isOver = true;
            // faccio la chiamata al server passando l'index della card
            axios.get(this.apiUrl, {params: {
                // al server passo il params description con l'index per ottenre la descrizione dell'elemento cliccato
                description: index
            }})
                .then(results => {
                    // salvo il risultato in un array
                    this.description = results.data
                })
        },
        close(){
            this.description = [];
            this.isOver = false;
        }
    },
    mounted(){
        this.getAlbums();
    }
}).mount('#app')