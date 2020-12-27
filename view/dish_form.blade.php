<div class="dish">
    <button class="btn dish-btn">
        <div>{{$dish->name}}</div>
        <div>¥{{$dish->price}}</div>
    </button>
    <div>{{$dish->info}}</div>
</div>

<script src="text/javascript">
    window.on('load', createDishApp);

    function createDishApp() {
        dishApp = new Vue({
            delimiter: ['[[', ']]'],
            data: {
                'dish': @php($dish)
            }
        });
    }
</script>
