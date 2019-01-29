import TweenMax from "../gsap_minified/TweenMax.min"

class Search {
    constructor(input, item_cnt, items) {
        this.input = input
        this.searched = []
        this.item_cnt = item_cnt
        this.items = items
    }

    search(e) {
        if (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode == 8) {
            this.input = e.target.value.toLowerCase()
            if (e.target.value == "") {
                this.appendItems(this.item_cnt, this.items)
            }
            this.animateChange(this.item_cnt)
            this.searched = this.items.filter(letter => letter.dataset.reference.toLowerCase().indexOf(this.input) !== -1)
            this.item_cnt.innerHTML = ""
            this.appendItems(this.item_cnt, this.searched)
        }
    }

    appendItems(cnt, elements) {
        elements.forEach(element => {
            cnt.appendChild(element)
        })
    }

    animateChange(item_cnt) {
        let gsap = new TimelineMax();

        gsap.fromTo(item_cnt, .6, {
                opacity: 0,
                y: 10
            },
            {
                delay: .1,
                opacity: 1,
                y: 0
            })
    }
}

export default Search