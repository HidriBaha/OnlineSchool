document.addEventListener('DOMContentLoaded', function () {
    const courseContainers = document.querySelectorAll('.course-container');
    const previewContainer = document.getElementById('preview-container');
    const kursListe =document.querySelector(".kurs-liste");

    courseContainers.forEach(container => {
        container.addEventListener('click', function () {
            const title = this.querySelector('.course-title').innerText;
            const description = this.querySelector('.course-description').innerText;
            const progress = this.querySelector('.progress-bar').innerText;
            const imageSrc = this.querySelector('.image-store').innerText;
            const link = this.querySelector('.btn-primary').getAttribute("href");
            console.log(link)
            kursListe.style.maxHeight="calc(100vh - 245px)";
            kursListe.style.overflowY = "scroll";

            previewContainer.style.display = "flex";
            previewContainer.style.flexDirection = "column"
            previewContainer.innerHTML = `
                <h3>${title}</h3>
                <img src="${imageSrc}" alt="Hier kann ein Preview Bild sein" width="150px" height="150px">
                <p>${description}</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" >${progress}</div>
                </div>
                <a class="btn btn-primary" href=${link} >Kurs starten</a>
            `;
        });
    });
});