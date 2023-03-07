
function remove(id,type,image){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var thiskclick =$(this);

console.log(id);
    var data = {
        'id':id,
        'type':type,
        'image':image
    };

    $.ajax({
        url: '/admin/admin-remove',
        type: 'POST',
        data: data,
        success: function (response) {
            // if(response.status == 200){
            //     thiskclick.closest('.item').remove();
            //     $('#bagkload').load(location.href + ' .bag');
            // }


        }
    });
};


function edit(id,type,image){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var thiskclick =$(this);

console.log(id);
    var data = {
        'id':id,
        'type':type,
        'image':image
    };

    $.ajax({
        url: '/admin/editproduct',
        type: 'POST',
        data: data,
        success: function (response) {
            // if(response.status == 200){
            //     thiskclick.closest('.item').remove();
            //     $('#bagkload').load(location.href + ' .bag');
            // }


        }
    });
};



