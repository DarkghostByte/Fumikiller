<template>
    
    <div class="flex justify-center items-center h-screen bg-neutral-950">
        <div class="w-1/2">
            <div class="DivAzul">
                <div class="DivNaranja">
                    <h1 style="margin-top:15%;font-size: 60px; ">FUMI-KILLE'R</h1>
                    <button class="btnInicio">INICIO</button>
                </div>
            </div>   
            
            
        </div>
    </div>




<!--

    <div class="w-10 h-10" style="background-color: black;">
       
        <div class="DivAzul">
            <div class="DivNaranja">
                <h1 style="margin-top:15%;font-size: 60px; ">FUMI-KILLE'R</h1>
                <button class="btnInicio">INICIO</button>
            </div>
        </div>   
        
    </div>
       -->
    
    
</template>

<style>
.DivAzul{
    margin-left: -10%; 
    margin-top: 2%; 
    border-radius: 25px;
    width: 100%; height:90vh; 
    background-color:#0F0F88; 
}
.DivNaranja{
    position:absolute; 
    text-align: center; 
    margin-left: 20%;  
    border-radius: 25px; 
    width: 40%; height:90vh; 
    background-color:#FD5902; 

}
.btnInicio{
    margin-top: 15%;
    background-color: black; 
    border-radius: 45px; 
    width:240px; 
    height:80px; 
    color:aliceblue; 
    font-size:50px; 
    text-align: center;
    border: none;    
    transition: 2s;
}
.btnInicio:hover{
    background-color:#0F0F88;
    align-items: center;
    transform: scale(1.1);
    text-align: center;
    height: 85px;
    width: 245px;
    border: 1px,solid,black;
}
</style>

<script>
    export default{
        name:'LoginComponent',
    }
</script>
