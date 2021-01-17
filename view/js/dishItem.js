
let dishItem = {

    props: {
        dishJson: {
            type: Object,
            required: true
        }
    },

    data: function () {
        return {
            dish: this.dishJson,
            dishNum: 0,
            isActive: false
        }
    },

    template:`
<div>
    <button class="btn dish-btn" @click="formActivate">
        <div>{{dish.name}}</div>
        <div>&yen;{{dish.price}}</div>
    </button>
    <div>{{dish.info}}</div>
    <div v-show="isActive">
        <div>{{dish.name}}</div>
        <div>
            <input v-model="dishNum" type="text">個
        </div>
        <div>
            <button @click="add2Cart">買い物カートへ</button>
        </div>
        <button @click="formInactivate">閉じる</button>
    </div>
</div>
    `,
    methods: {
        formActivate: function () {
            this.isActive = true;
        },
        formInactivate: function () {
            this.isActive = false;
        },
        add2Cart: function () {
            console.log(this.dish.name);
            console.log(this.dishNum);
        }
    }
}