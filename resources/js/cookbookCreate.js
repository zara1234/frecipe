import Search from "./Classes/Search.js"
const input = document.querySelector("input#search")
const item_cnt = document.querySelector(".search-results .cnt--inner")
const items = Array.from(document.querySelectorAll(".search-results .cnt--inner .card"))
const searchLetter = new Search(input, item_cnt, items);

input.addEventListener("keyup", e => {
    searchLetter.search(e)
})

let ingredients = {}
items.forEach(e => {

    e.addEventListener("click", ev => {
        let clone = ev.target.cloneNode(true)
        let current = ev.target
        current.style.display = "none"

        clone.className = "ingredient card"
        clone.style.display = "unset"
        clone.setAttribute("data-unit", current.dataset.unit)

        let unit = document.createElement("input")
        unit.setAttribute("type", "number")
        unit.setAttribute("class", "unit-input")
        unit.setAttribute("name", "unit-"+clone.dataset.reference)
        unit.setAttribute("placeholder", clone.dataset.unit)

        let input = document.createElement("input")
        input.setAttribute("type", "hidden")
        input.setAttribute("name", "id-"+clone.dataset.reference)
        input.setAttribute("value", clone.dataset.id)



        let close = document.createElement("div")

        close.classList.add("close")
        clone.append(close)
        clone.append(unit)
        // clone.append(input)

        ingredients[clone.dataset.id] = ""

        document.querySelector(".search-selected").append(clone)

        clone.addEventListener("click", ev => {
            console.log(ev.target);
        })

        clone.querySelector(".close").addEventListener("click", ev => {
            ev.target.parentElement.style.display = "block"
            ev.target.parentElement.remove()
            current.style.display = "block"

        })

    })

})


document.querySelector("#cookbookCreateForm").addEventListener("submit", e => {
    let units = document.querySelectorAll("input.unit-input")
    units.forEach(item => {
        ingredients[item.parentElement.dataset.id] = item.value
        document.querySelector("input[name='ingredients']").value = JSON.stringify(ingredients)
    })
})