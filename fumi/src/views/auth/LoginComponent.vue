<template>
    <div class="DivAzul">
        
    </div>
    <div class="DivNaranja">
        <h1 style="margin-top:35%;font-size: 60px; ">FUMI-KILLE'R</h1>
        <button class="btnInicio">INICIO</button>
    </div>
</template>

<style>
.DivAzul{
    margin-left:300px; 
    margin-top: 30px; 
    border-radius: 25px;
    width: 45%; height:90vh; 
    background-color:#0F0F88; 
}
.DivNaranja{
    position:absolute; 
    text-align: center; 
    margin-left:625px; 
    margin-top: -661px; 
    border-radius: 25px; 
    width: 600PX; height:90vh; 
    background-color:#FD5902; 

}
.btnInicio{
    background-color: black; 
    border-radius: 45px; 
    width:250px; 
    height:90px; 
    color:aliceblue; 
    font-size:55px; 
    text-align: center;
    border: none;    
    transition: 2s;
}
.btnInicio:hover{
    background-color:#fc5310;
    align-items: center;
    transform: scale(1.1);
    text-align: center;
    height: 95px;
    width: 255px;
    border: 1px,solid,black;
}
</style>

<script>
    export default{
        name:'LoginComponent',
    }
</script>
