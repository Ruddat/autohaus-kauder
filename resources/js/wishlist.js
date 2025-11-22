document.addEventListener('DOMContentLoaded', () => {
    const wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');

    wishlist.forEach(id => {
        let el = document.getElementById('heart-' + id);
        if (el) el.classList.add('text-red-500');
    });
});
console.log('Wishlist JS loaded!');
window.toggleWishlist = function(id) {
    let wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');

    const index = wishlist.indexOf(id);
    const heart = document.getElementById('heart-' + id);

    if (index === -1) {
        wishlist.push(id);
        heart.classList.remove('text-white/40');
        heart.classList.add('text-red-500');
    } else {
        wishlist.splice(index, 1);
        heart.classList.remove('text-red-500');
        heart.classList.add('text-white/40');
    }

    localStorage.setItem('wishlist', JSON.stringify(wishlist));

    if (window.Livewire) {
        Livewire.dispatch('wishlist-updated', { wishlist });
    }
};
