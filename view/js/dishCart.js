
let dishCart = new Vue({
    el: '#shopping-cart',
    delimiters: ['[[', ']]'],
    data: {
        items: [],
        itemNum: 0
    },
    watch: {
        items: function () {
            this.itemNum = this.items.length;
        }
    },
    methods: {
        submitItems: function () {
            let postData = {
                orders: this.items
            };
            axios
                .post('index.php?action=putOrderDb', JSON.stringify(postData))
                .then(function (response){
                    console.log('success');
                    dishCart.items = [];
                })
                .catch(function (error){
                    console.log('failed');
                });

    }
});