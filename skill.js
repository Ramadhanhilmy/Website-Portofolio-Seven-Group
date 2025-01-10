document.addEventListener("DOMContentLoaded", function() {
    const skillBars = document.querySelectorAll('.skill-bar span');
    const skillPercentages = document.querySelectorAll('.skill-percentage');

    skillBars.forEach((skillBar, index) => {
        const percentageText = skillPercentages[index].textContent.trim();
        const targetPercentage = parseInt(percentageText.slice(0, -1), 10); // Mengambil angka
        skillBar.style.width = targetPercentage + '%'; // Set lebar sesuai persentase

        let currentPercentage = 0; // Mulai dari 0
        const interval = setInterval(() => {
            if (currentPercentage < targetPercentage) {
                currentPercentage++; // Tambah persentase
                skillPercentages[index].textContent = currentPercentage + '%'; // Update teks
            } else {
                clearInterval(interval); // Hentikan jika sudah mencapai target
            }
        }, 20); // Ubah setiap 20ms
    });
});
