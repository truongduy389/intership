function uphost() {
    
    var color = $('#color').val();
    var size = $('#size').val();
    console.log(size);
    for(i=0;i<color.length;i++){
        for(j=0;j<size.length;j++){
      var words = 'Ao' + Math.floor(Math.random() * 100000);
    var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('front', $('#imgEdited').val());
    formData.append('back', $('#imgEditeds').val());
    formData.append('status', "0");
    formData.append('parentId', "1");
    formData.append('color',color[i]);
    formData.append('price', "10000");
    formData.append('saleprice', "5000");
    formData.append('sku', words);
    formData.append("description", "áo");
    formData.append("size",size[j]);
    console.log(formData);
    var settings = {
        "url": "https://phamxuanduc.000webhostapp.com/api/image/store",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": formData
    };

    
    $.ajax(settings).done(function(response) {
        location.href = "http://localhost";
    });
}
}
}

function updateAttr(id){
    var form = new FormData();
    form.append("saleprice", $(`#sale-price${id}`).val())
    // form.append("saleprice", $('#sale-price').val());
    form.append("sku", $(`#sku${id}`).val());
    var settings = {
    "async": true,
    "crossDomain": true,
    "url": `https://phamxuanduc.000webhostapp.com/api/image/update/${id}`,
    "method": "POST",
    "processData": false,
    "contentType": false,
    "mimeType": "multipart/form-data",
    "data": form
    }

    $.ajax(settings).done(function (response) {
        console.log(settings);
    });
}

// function deletePorduct(id){
//     var form = new FormData();
//     form.append("saleprice", $(`#sale-price${id}`).val())
//     // form.append("saleprice", $('#sale-price').val());
//     form.append("sku", $(`#sku${id}`).val());
//     var settings = {
//     "async": true,
//     "crossDomain": true,
//     "url": `https://phamxuanduc.000webhostapp.com/api/image//${id}`,
//     "method": "POST",
//     "processData": false,
//     "contentType": false,
//     "mimeType": "multipart/form-data",
//     "data": form
//     }

//     $.ajax(settings).done(function (response) {
//         console.log(settings);
//     });
// }