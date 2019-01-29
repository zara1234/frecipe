function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            console.log(e.target);
            document.querySelector("div.image-preview img").setAttribute("src", e.target.result)
            document.querySelector("input#image").setAttribute("value", e.target.result)

        }

        reader.readAsDataURL(input.files[0]);
    }
}
if(document.querySelector("input#image")) {
    document.querySelector("input#image").addEventListener("change", function(e) {
        readURL(e.target);
    });
}
