<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: .25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

    .me-2 {
        margin-right: .5rem !important;
    }
    .activebtn{
        background-color: blue;
        color: white;
    }
</style>
<div class="col-md-12" style="display: flex;justify-content: center;margin-bottom: 20px;">
    <div class="col-md-12" style="display: flex;justify-content: center;">
    <button class="btn activebtn manage" onclick="manage()">Manage My Account</button>
        <button class="btn order"  onclick="order()">My Orders</button>
        <button class="btn canc" onclick="cancelor()">My Return & cancellation</button>
    </div>
</div>
<div class="container" id="load">

    
</div>

<script>
    $(document).ready(function(){
        $('#load').load('userupdate');
    })
    function manage(){
        $('.manage').addClass('activebtn');
        $('.order').removeClass('activebtn');
        $('.canc').removeClass('activebtn');
        $('#load').load('userupdate');
    }
    function order(){
        $('.order').addClass('activebtn');
        $('.manage').removeClass('activebtn');
        $('.canc').removeClass('activebtn');
        $('#load').load('myorder');
    }
    function cancelor(){
        $('.canc').addClass('activebtn');
        $('.manage').removeClass('activebtn');
        $('.order').removeClass('activebtn');
        $('#load').load('cancelorder');
    }
</script>