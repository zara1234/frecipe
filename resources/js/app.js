console.log("Go! :D");

//
// $('.form1').hide();
//   $(".button1").on('click',function(){
//       $(this).parent().next().toggle();
//     });


import Search from "./Classes/Search.js"
const input = document.querySelector("input#search")
const item_cnt = document.querySelector(".cnt")
const items = Array.from(document.querySelectorAll(".cnt--item"))
const searchLetter = new Search(input, item_cnt, items);


input.addEventListener("keyup", e => {
  searchLetter.search(e)
})

