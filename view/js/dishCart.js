
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
                id: id,
                orders: this.items
            };
            axios
                .post('/teishoku_order/action/putOrderDb.php', JSON.stringify(postData))
                .then(function (response) {
                    console.log('success');
                    dishCart.items = [];
                })
                .catch(function (error) {
                    console.log('failed');
                });
        }
    }
});