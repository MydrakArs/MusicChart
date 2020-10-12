<template>
    <div class="content">
        <div class="logo">
        </div>
        <div class="text">
            <h1>MusiсCharts</h1>
            <p>
                Представляем вашему вниманию новую площадку MusicCharts. Площадка предоставляет услуги прослушивания музыки совершенно бесплатно, а так же она
                создана для продвижения молодых исполнителей в любом жанре. Если вас заинтересовало, то проходи быструю регистрацию и приступай к использованию! :)
            </p>    
        </div>   
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted')
    }
}
</script>

<style lang="less" scoped>

@WC: #ffffff;
@ActiveColor: #24CBE2;
@ContentColor: #24232D;



.content{
    
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    flex-direction: column;
    
    p {
        color: @WC;
        width: 57vh;
        font-size: 24px;
    }
}

.logo {
    width: 250px;
    height: 200px;
    background-image: url(C:/Users/Y700/Downloads/FireShot/123/logo.png);
    background-size: cover;
}

.text {
    color: @ContentColor;
    font-size: 36px;
    font-family: 'Roboto', sans-serif;
}

.content {
    flex-grow: 5;
    background-image: url(C:/Users/Y700/Downloads/image/FonStartPage.jpg);
    background-size: cover;
    filter: grayscale(20%);
}



</style>