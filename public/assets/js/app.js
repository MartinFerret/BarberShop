const app = {

    init : function () {
        console.log('Init');

        const inputText = document.querySelectorAll('.input');
        inputText.forEach(element => {
            element.addEventListener('keyup', app.handleKeyUp);
            
        });

        window.addEventListener('scroll', app.handleScroll);

        const selectButton = document.querySelector('.tri select');
        selectButton.addEventListener('change', app.handleChange);

    
    },

     handleScroll : function () {
        navbarLi = document.querySelectorAll('#menu li');
        if(document.documentElement.scrollTop > 10) {
            document.getElementById('menu').style.backgroundColor = "white";
            document.getElementById('menu').style.height = "60px";
            document.getElementById('menu').style.transition = "0.9s ";
            for(let i = 0; i < navbarLi.length; i++) {
                navbarLi[i].style.color = "black";
            }
        } else {
            document.getElementById('menu').style.backgroundColor = "transparent";
            for(let i = 0; i < navbarLi.length; i++) {
                navbarLi[i].style.color = "white";
            }
        }
    }, 


    handleKeyUp : function (e) {
        const targetValue = e.target.value;
        const targetInput = e.target;
        if(targetValue.length > 1) {
            targetInput.style.borderColor = "green";
        } else {
            targetInput.style.borderColor = "red";
        }

    },

    handleChange : function () {
        const selectValue = document.querySelector('.tri select').value;
        const huileCategory = document.querySelectorAll('.container-products-page .product-page[data-type="1"]');
        const beaumeCategory = document.querySelectorAll('.container-products-page .product-page[data-type="2"]');
        const rasoirCategory = document.querySelectorAll('.container-products-page .product-page[data-type="3"]');
        const peigneCategory = document.querySelectorAll('.container-products-page .product-page[data-type="4"]');


        if(selectValue == "0") {
            for (let i = 0; i < huileCategory.length; i++) {
                huileCategory[i].style.display= "block";
            }

            for (let i = 0; i < beaumeCategory.length; i++) {
                beaumeCategory[i].style.display= "block";
            }

            for (let i = 0; i < rasoirCategory.length; i++) {
                rasoirCategory[i].style.display= "block";
            }

            for (let i = 0; i < peigneCategory.length; i++) {
                peigneCategory[i].style.display= "block";
            }
        }

        if(selectValue == "1") {
            for (let i = 0; i < huileCategory.length; i++) {
                huileCategory[i].style.display= "block";
            }

            for (let i = 0; i < beaumeCategory.length; i++) {
                beaumeCategory[i].style.display= "none";
            }

            for (let i = 0; i < rasoirCategory.length; i++) {
                rasoirCategory[i].style.display= "none";
            }

            for (let i = 0; i < peigneCategory.length; i++) {
                peigneCategory[i].style.display= "none";
            }

        }

        if(selectValue == "2") {
            for (let i = 0; i < beaumeCategory.length; i++) {
                beaumeCategory[i].style.display= "block";
            }

            for (let i = 0; i < huileCategory.length; i++) {
                huileCategory[i].style.display= "none";
            }

            for (let i = 0; i < rasoirCategory.length; i++) {
                rasoirCategory[i].style.display= "none";
            }

            for (let i = 0; i < peigneCategory.length; i++) {
                peigneCategory[i].style.display= "none";
            }

        }

        if(selectValue == "3") {
            for (let i = 0; i < rasoirCategory.length; i++) {
                rasoirCategory[i].style.display= "block";
            }

            for (let i = 0; i < beaumeCategory.length; i++) {
                beaumeCategory[i].style.display= "none";
            }

            for (let i = 0; i < huileCategory.length; i++) {
                huileCategory[i].style.display= "none";
            }

            for (let i = 0; i < peigneCategory.length; i++) {
                peigneCategory[i].style.display= "none";
            }

        }

        if(selectValue == "4") {
            for (let i = 0; i < peigneCategory.length; i++) {
                peigneCategory[i].style.display= "block";
            }

            for (let i = 0; i < beaumeCategory.length; i++) {
                beaumeCategory[i].style.display= "none";
            }

            for (let i = 0; i < rasoirCategory.length; i++) {
                rasoirCategory[i].style.display= "none";
            }

            for (let i = 0; i < huileCategory.length; i++) {
                huileCategory[i].style.display= "none";
            }

        }


    }

    
}

document.addEventListener('DOMContentLoaded', app.init);