// home
// переснять
document.getElementById('capture').addEventListener('click', function() {
  var button = this;
  button.innerHTML = 'Переснять <svg id="icon-refresh" xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" viewBox="0 0 24 24"><path fill="black" fill-rule="evenodd" d="M2.93 11.2c.072-4.96 4.146-8.95 9.149-8.95a9.158 9.158 0 0 1 7.814 4.357a.75.75 0 0 1-1.277.786a7.658 7.658 0 0 0-6.537-3.643c-4.185 0-7.575 3.328-7.648 7.448l.4-.397a.75.75 0 0 1 1.057 1.065l-1.68 1.666a.75.75 0 0 1-1.056 0l-1.68-1.666A.75.75 0 1 1 2.528 10.8zm16.856-.733a.75.75 0 0 1 1.055 0l1.686 1.666a.75.75 0 1 1-1.054 1.067l-.41-.405c-.07 4.965-4.161 8.955-9.18 8.955a9.197 9.197 0 0 1-7.842-4.356a.75.75 0 1 1 1.277-.788a7.697 7.697 0 0 0 6.565 3.644c4.206 0 7.61-3.333 7.68-7.453l-.408.403a.75.75 0 1 1-1.055-1.067z" clip-rule="evenodd"/></svg>';
});



let stream = null;
const video = document.getElementById('video');
const captureButton = document.getElementById('capture');

const startCamera = () => {
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(s => {
        stream = s;
        video.srcObject = stream;
      })
      .catch(error => {
        console.error('Ошибка при доступе к камере:', error);
        
      });
  };

  const stopCamera = () => {
    if (stream) {
      stream.getTracks().forEach(track => track.stop());
    }
  };

// Функция, которая обрабатывает захват изображения
const handleCapture = () => {
    const canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

    canvas.toBlob(blob => {
        const formData = new FormData();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        formData.append('_token', csrfToken);
        formData.append('image', blob, 'avatar.png');

        saveAvatar(formData);
    }, 'image/png');
};

// Функция отправки изображения на сервер
const saveAvatar = (formData) => {
    fetch('/save-avatar', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка при отправке изображения на сервер');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('avatar').src = '/images/' + data.avatar;
        })
};



navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => video.srcObject = stream)
    .catch(error => {
        console.error('Ошибка при доступе к камере:', error);
    });

captureButton.addEventListener('click', handleCapture);
captureButton.addEventListener('click', () => {
    startCamera();
  });
  
  video.addEventListener('click', () => {
    stopCamera();
  });


      // уведомление о создании аватара
  $('.made-avatar').on('click', function() {
    console.log('.made-avatar button clicked');
    Swal.fire({
        icon: 'success',
        title: 'Аватар создан!',
        showConfirmButton: false,
        timer: 1500
    });
});

//  соглашение
document.getElementById('acceptButton').addEventListener('click', function() {
  var agreementSection = document.getElementById('agreementSection');
  agreementSection.style.opacity = '0';
  setTimeout(function() {
    agreementSection.style.display = 'none';
  }, 500);
});


  
  