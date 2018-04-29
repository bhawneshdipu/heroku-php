function update_visitoroffer(){
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/api/visitoroffer",
        data: {},
        success: function (res) {
            console.log(res);

            res=JSON.parse(res);
            var data="";
            data+='<table class="table table-responsive">';
            data+='<thead>';

            data+='<tr><td>notification_tel</td><td>quantity</td><td>variant</td><td>offer_price</td></tr>';
            data+='</thead><tbody>';
            res.forEach(function(val,idx){
                var row='';
                row+='<tr>';
                row+='<td>'+val['notification_tel']+'</td>';
                row+='<td>'+val['quantity']+'</td>';
                row+='<td>'+val['variant']+'</td>';
                row+='<td>'+val['offer_price']+'</td>';

                data+=row;
                console.log(row);
            });
            data+='</tbody></table>';
            $('#visitoroffer  > div.card > div.card-body').html((data));
        },
        error: function (res) {

        }
    });

}
function update_sellerdeal(){
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/api/sellerdeal",
        data: {},
        success: function (res) {
            console.log(res);
            res=JSON.parse(res);
            var data="";
            data+='<table class="table table-responsive">';
            data+='<thead>';

            data+='<tr><td>notification_tel</td><td>quantity</td><td>variant</td><td>deal_price</td></tr>';
            data+='</thead><tbody>';
            res.forEach(function(val,idx){
                var row='';
                row+='<tr>';
                row+='<td>'+val['notification_tel']+'</td>';
                row+='<td>'+val['quantity']+'</td>';
                row+='<td>'+val['variant']+'</td>';
                row+='<td>'+val['deal_price']+'</td>';

                data+=row;
                console.log(row);
            });

            data+='</tbody></table>';
            console.log(data);
            $('#sellerdeal > div.card > div.card-body').html((data));
        },
        error: function (res) {

        }
    });

}
function update_selltoany(){
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/api/selltoany",
        data: {},
        success: function (res) {
            console.log(res);

            res=JSON.parse(res);

            var data="";
            data+='<table class="table table-responsive">';
            data+='<thead>';

            data+='<tr><td>email</td><td>category</td><td>quantity</td><td>seller_price</td></tr>';
            data+='</thead><tbody>';
            res.forEach(function(val,idx){
                var row='';
                row+='<tr>';
                row+='<td>'+val['notification_email_id']+'</td>';
                row+='<td>'+val['category']+'</td>';
                row+='<td>'+val['quantity']+'</td>';
                row+='<td>'+val['seller_price']+'</td>';

                data+=row;
                console.log(row);
            });

            data+='</tbody></table>';
            console.log(data);
            $('#selltoany  > div.card > div.card-body').html((data));
        },
        error: function (res) {

        }
    });

}
function update_buyfromany(){
    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/api/buyfromany",
        data: {},
        success: function (res) {
            console.log(res);

            res=JSON.parse(res);
            var data="";
            data+='<table class="table table-responsive">';
            data+='<thead>';

            data+='<tr><td>email</td><td>category</td><td>quantity</td><td>buyer_price</td></tr>';
            data+='</thead><tbody>';
            res.forEach(function(val,idx){
                var row='';
                row+='<tr>';
                row+='<td>'+val['notification_email_id']+'</td>';
                row+='<td>'+val['category']+'</td>';
                row+='<td>'+val['quantity']+'</td>';
                row+='<td>'+val['buyer_price']+'</td>';

                data=data+row;
                console.log(row);
                console.log(data);

            });
            data+='</tbody></table>';
            console.log(data);
            $('#buyfromany > div.card > div.card-body').html((data));
        },
        error: function (res) {

        }
    });

}

setInterval(update_buyfromany,5000);
setInterval(update_selltoany,5000);
setInterval(update_visitoroffer,5000);
setInterval(update_sellerdeal,5000);
