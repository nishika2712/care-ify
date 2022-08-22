function openSidebar(){
    let isOpen = document.getElementById("sidebar");
    if(isOpen.style.display === 'none'){
        isOpen.style.display = 'block';
        document.getElementById("menu-btn").style.color = '#fff';
    }
    else{
        isOpen.style.display = 'none';
        document.getElementById("menu-btn").style.color = 'var(--green)';
    }     
}

function closeSidebar(){
    let isOpen = document.getElementById("sidebar");
    if(isOpen.style.display != 'none'){
        isOpen.style.display = 'none';
        document.getElementById("menu-btn").style.color = 'var(--green)';
    }
}

