
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
                user_id: id,
                orders: JSON.stringify(this.items)
            };
            axios
                .post('/teishoku_order/index.php?action=putOrderDb', postData)
                .then(function (response) {
                    console.log(response);
                    dishCart.items = [];
                })
                .catch(function (error) {
                    console.log('failed');
                });
        }
    }
});