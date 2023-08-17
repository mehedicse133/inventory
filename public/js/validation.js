$(document).ready(function() {
    // Start brandAddFormValidation
    $('.brandValidation').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        var _token = $('input[name="_token"]').val();
        //var brandName = document.forms["brandAddForm"]["name"].value;
        var letters = /[0-9a-zA-Z]+$/;
        if (name == '') {
        document.getElementById('name').classList.add('is-invalid')
        document.getElementById('nameMessage').innerHTML = " Brand Name is Mendotary"
        document.getElementById("nameMessage").style.color = "red";
        return false;
        } else if (name.length >= 50) {
        document.getElementById('name').classList.add('is-invalid')
        document.getElementById('nameMessage').innerHTML = " Brand Name Maximum length is 50"
        document.getElementById("nameMessage").style.color = "red";
        return false;
        } else if (!name.match(letters)) {
        document.getElementById('name').classList.add('is-invalid')
        document.getElementById('nameMessage').innerHTML = "  Brand name can only allow alphanumeric characters"
        document.getElementById("nameMessage").style.color = "red";
        return false;
        }
        // document.getElementById('name').classList.add('is-valid')
         if (name) {
            $.ajax({
                url: "/brand-check",
                method: "POST",
                data: {
                    name: name,
                    _token: _token
                },
                success: function(brand) {
                    if(brand > 0)
                    {

                        document.getElementById('name').classList.add('is-invalid')
                        document.getElementById('nameMessage').innerHTML = " Duplicate brand name will not be allowed"
                        document.getElementById("nameMessage").style.color = "red";
                        return false;
                    }
                    else
                    {
                       e.currentTarget.submit();
                        return true;
                    }
                },
            })
        }
    });
    // End brandAddFormValidation

    // Start modelAddFormValidation
    $('.modelValidation').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        var brand_id = document.forms["modelAddForm"]["brand_id"].value;
        // var model = document.forms["modelAddForm"]["name"].value;
        var _token = $('input[name="_token"]').val();
        var letters = /[0-9a-zA-Z]+$/;
        if (brand_id == '') {
            document.getElementById('brand_id').classList.add('is-invalid')
            document.getElementById('brandMessage').innerHTML = " Brand Name is Mendotary"
            document.getElementById("brandMessage").style.color = "red";
            return false;
         } else if (name == '') {
            document.getElementById('name').classList.add('is-invalid')
            document.getElementById('modelMessage').innerHTML = " Model Name is Mendotary"
            document.getElementById("modelMessage").style.color = "red";
            return false;
         } else if (name.length >= 100) {
            document.getElementById('name').classList.add('is-invalid')
            document.getElementById('modelMessage').innerHTML = " Maximum length of Model Name is 100"
            document.getElementById("modelMessage").style.color = "red";
            return false;
         } else if (!name.match(letters)) {
            document.getElementById('name').classList.add('is-invalid')
            document.getElementById('modelMessage').innerHTML = " Model name can only allow alphanumeric characters"
            document.getElementById("modelMessage").style.color = "red";
            return false;
         }
        // document.getElementById('name').classList.add('is-valid')
        if (name) {
            $.ajax({
                url: "/model-check",
                method: "POST",
                data: {
                    brand_id: brand_id,
                    name: name,
                    _token: _token
                },
                success: function(model) {
                    if(model > 0)
                    {
                        document.getElementById('name').classList.add('is-invalid')
                        document.getElementById('modelMessage').innerHTML = " Duplicate model name of same brand will not be allowed "
                        document.getElementById("modelMessage").style.color = "red";
                        return false;
                    }
                    else
                    {
                       e.currentTarget.submit();
                        return true;
                    }
                },
            })
        }
    });
    // End modelAddFormValidation
    
    // Start itemAddFormValidation
    $('.itemValidation').submit(function(e) {
        e.preventDefault();
        var name = $('#name').val();
        var brand_id = document.forms["itemAddForm"]["brand_id"].value;
        var model_id = document.forms["itemAddForm"]["model_id"].value;
        // var item = document.forms["itemAddForm"]["name"].value;
        var _token = $('input[name="_token"]').val();
        var letters = /[0-9a-zA-Z]+$/;
        if (brand_id == '') {
            document.getElementById('brand_id').classList.add('is-invalid')
            document.getElementById('brandMessage').innerHTML = " Brand Name is Mendotary"
            document.getElementById("brandMessage").style.color = "red";
            return false;
         } else if (model_id == '') {
            document.getElementById('model_id').classList.add('is-invalid')
            document.getElementById('modelMessage').innerHTML = " Model Name is Mendotary"
            document.getElementById("modelMessage").style.color = "red";
            return false;
         }
         else if (name == '') {
            document.getElementById('name').classList.add('is-invalid')
            document.getElementById('itemMessage').innerHTML = " Item Name is Mendotary"
            document.getElementById("itemMessage").style.color = "red";
            return false;
         }
        else if (name.length >= 250) {
            document.getElementById('name').classList.add('is-invalid')
            document.getElementById('itemMessage').innerHTML = " Maximum length of Item Name is 250"
            document.getElementById("itemMessage").style.color = "red";
            return false;
         } else if (!name.match(letters)) {
            document.getElementById('name').classList.add('is-invalid')
            document.getElementById('itemMessage').innerHTML = " Item name can only allow alphanumeric characters"
            document.getElementById("itemMessage").style.color = "red";
            return false;
         }
        document.getElementById('name').classList.add('is-valid')
        if (name) {
            $.ajax({
                url: "/item-check",
                method: "POST",
                data: {
                    brand_id: brand_id,
                    model_id: model_id,
                    name: name,
                    _token: _token
                },
                success: function(item) {
                    console.log(item)
                    if(item > 0)
                    {
                        document.getElementById('name').classList.add('is-invalid')
                        document.getElementById('itemMessage').innerHTML = " Duplicate item name of same brand and model will not be allowed  "
                        document.getElementById("itemMessage").style.color = "red";
                        return false;
                    }
                    else
                    {
                       e.currentTarget.submit();
                        return true;
                    }
                },
            })
        }
    });
    // End itemAddFormValidation
});
    


// delete 
 function is_delete(message) {
     var check = confirm(message);
     if (check) {
         return true;
     } else {
         return false;
     }
 }

 