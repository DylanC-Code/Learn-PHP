"use-strict"

export default function burgerController() {
  document.getElementById('burger').addEventListener('click', () => {
    document.querySelector('nav ul').classList.toggle('invisible');
  })
}