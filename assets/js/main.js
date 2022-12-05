const { createApp } = Vue;

createApp({
    data(){
        return {
            apiUrl: 'server.php',
            albums: [],
            description: []
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
            // faccio la chiamata al server passando l'index della card
            axios.get(this.apiUrl, {params: {
                // al server passo il params description con l'index per ottenre la descrizione dell'elemento cliccato
                description: index
            }})
                .then(results => {
                    // salvo il risultato in un array
                    this.description = results.data
                })
        }
    },
    mounted(){
        this.getAlbums();
    }
}).mount('#app')