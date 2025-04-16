document.addEventListener("DOMContentLoaded", function() {
    const textElement = document.getElementById('about-text');
    const text = "Voldemart adalah sebuah platform e-commerce di dark web yang terkenal karena menjual berbagai barang ilegal. Mulai dari narkotika hingga senjata, Voldemart menjadi destinasi utama bagi para pengguna dark web yang mencari barang-barang terlarang.";
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            textElement.innerHTML += text.charAt(index);
            index++;
            setTimeout(typeWriter, 50); 
        } else {
            textElement.classList.add('completed'); 
        }
    }

    typeWriter();
});

// fitur untuk musik
function toggleMusic() {
    const music = document.getElementById('background-music');
    const musicButtonIcon = document.querySelector('.music-button i');
    if (music.paused) {
        music.play();
        musicButtonIcon.classList.remove('fa-play');
        musicButtonIcon.classList.add('fa-pause');
    } else {
        music.pause();
        musicButtonIcon.classList.remove('fa-pause');
        musicButtonIcon.classList.add('fa-play');
    }
}


// data untuk user login
const users = [
{ name: "BlackHatGhost", status: "online", lastLogin: "5 minutes ago", level: "newbie" },
{ name: "CyberNinja", status: "offline", lastLogin: "1 hour ago", level: "amateur" },
{ name: "DarkWebHunter", status: "online", lastLogin: "10 minutes ago", level: "hacker" },
{ name: "PhantomByte", status: "offline", lastLogin: "2 hours ago", level: "newbie" },
{ name: "CryptoWarrior", status: "online", lastLogin: "15 minutes ago", level: "professional" },
{ name: "ByteSlinger", status: "offline", lastLogin: "30 minutes ago", level: "newbie" },
{ name: "CodePhantom", status: "online", lastLogin: "20 minutes ago", level: "amateur" },
{ name: "ShadowEncryptor", status: "offline", lastLogin: "1 day ago", level: "hacker" },
{ name: "GhostHack3r", status: "online", lastLogin: "25 minutes ago", level: "hacker" },
{ name: "DigitalSpecter", status: "offline", lastLogin: "3 hours ago", level: "professional" },
{ name: "MatrixMarauder", status: "online", lastLogin: "18 minutes ago", level: "newbie" },
{ name: "CyberSpecter", status: "offline", lastLogin: "5 hours ago", level: "amateur" },
{ name: "ZeroDayPhantom", status: "online", lastLogin: "12 minutes ago", level: "amateur" },
{ name: "BitBandit", status: "offline", lastLogin: "6 hours ago", level: "hacker" },
{ name: "ShadowCipher", status: "online", lastLogin: "8 minutes ago", level: "professional" },
{ name: "QuantumGhost", status: "offline", lastLogin: "2 days ago", level: "newbie" },
{ name: "NexusBreaker", status: "online", lastLogin: "30 minutes ago", level: "amateur" },
{ name: "SilentByte", status: "offline", lastLogin: "1 week ago", level: "amateur" },
{ name: "CodedWraith", status: "online", lastLogin: "40 minutes ago", level: "hacker" },
{ name: "CipherSpecter", status: "offline", lastLogin: "4 days ago", level: "professional" },
];

let currentPage = 1; // Halaman saat ini
const usersPerPage = 4; // Jumlah pengguna per halaman
let filteredUsers = []; // Array untuk menyimpan hasil pencarian

// Fungsi untuk menampilkan pengguna dalam tabel
function displayUsers() {
const startIndex = (currentPage - 1) * usersPerPage;
const endIndex = startIndex + usersPerPage;
const userTableBody = document.getElementById('userTableBody');
userTableBody.innerHTML = '';

const usersToDisplay = filteredUsers.length > 0 ? filteredUsers : users;

for (let i = startIndex; i < endIndex && i < usersToDisplay.length; i++) {
const user = usersToDisplay[i];
const row = document.createElement('tr');
// Tambahkan class berdasarkan status online/offline dan level
const statusClass = user.status === 'online' ? 'status-online' : 'status-offline';
const levelClass = `level-${user.level.toLowerCase()}`;
row.innerHTML = `
<td>${user.name}</td>
<td class="${statusClass}">${user.status}</td>
<td>${user.lastLogin}</td>
<td class="${levelClass}">${user.level}</td>
`;
userTableBody.appendChild(row);
}
}

// Memulai dengan menampilkan pengguna pada halaman pertama
displayUsers();

// Fungsi untuk mengubah halaman
function prevPage() {
if (currentPage > 1) {
currentPage--;
displayUsers();
}
}

function nextPage() {
const maxPage = Math.ceil(filteredUsers.length > 0 ? filteredUsers.length / usersPerPage : users.length / usersPerPage);
if (currentPage < maxPage) {
currentPage++;
displayUsers();
}
}

// Fungsi untuk melakukan pencarian pengguna
function searchUsers() {
const searchInput = document.getElementById('searchInput').value.toLowerCase();
filteredUsers = users.filter(user => user.name.toLowerCase().includes(searchInput));
currentPage = 1; // Kembalikan ke halaman pertama setelah pencarian
displayUsers(); // Tampilkan hasil pencarian
}

// Aktifkan carousel otomatis
$('.carousel').carousel({
interval: 3000 // Waktu interval dalam milidetik
});



