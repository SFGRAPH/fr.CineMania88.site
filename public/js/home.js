document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');
    const indicators = document.querySelectorAll('.indicator');
    const totalItems = items.length;

    function showSlide(index) {
        if (index >= totalItems) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalItems - 1;
        } else {
            currentIndex = index;
        }

        items.forEach((item, i) => {
            item.classList.remove('active');
            indicators[i].classList.remove('active');
            if (i === currentIndex) {
                item.classList.add('active');
                indicators[i].classList.add('active');
            }
        });

        // const offset = -currentIndex * 100;
        // document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
    }

    document.querySelector('.carousel-control-next').addEventListener('click', () => {
        showSlide(currentIndex + 1);
    });

    document.querySelector('.carousel-control-prev').addEventListener('click', () => {
        showSlide(currentIndex - 1);
    });

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showSlide(index);
        });
    });

    setInterval(() => {
        showSlide(currentIndex + 1);
    }, 4000); // Changer d'image toutes les 3 secondes
});


// carousel accordéon

document.addEventListener('DOMContentLoaded', (event) => {
    const allBlocs = document.querySelectorAll('.bloc');

    allBlocs.forEach(bloc => {
        bloc.addEventListener('click', (e) => {
            allBlocs.forEach(b => b.classList.remove('active2')); // Remove active class from all blocs
            bloc.classList.add('active2'); // Add active class to clicked bloc
        });
    });

    const buttons = document.querySelectorAll('.bloc button');

    buttons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event bubbling up to parent .bloc
        });
    });
});



