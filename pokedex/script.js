const searchBtn = document.getElementById('searchBtn');
const pokemonInput = document.getElementById('pokemonInput');

const pokemonImage = document.getElementById('pokemonImage');
const pokemonName = document.getElementById('pokemonName');
const pokemonInfo = document.getElementById('pokemonInfo');

searchBtn.addEventListener('click', async () => {
  const pokemon = pokemonInput.value.toLowerCase();

  if (pokemon === '') {
    alert('Please enter a Pokemon name!');
    return;
  }

  try {
    // THIS WILL WORK ON LABORATORY 12 API
    const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemon}`);

    if (!response.ok) {
      throw new Error('Pokemon not found');
    }

    const data = await response.json();

    pokemonImage.src = data.sprites.front_default;
    pokemonName.textContent = data.name.toUpperCase();

    pokemonInfo.innerHTML = `
      ID: ${data.id}<br><br>
      Height: ${data.height}<br><br>
      Weight: ${data.weight}<br><br>
      Type: ${data.types.map(type => type.type.name).join(', ')}
    `;

  } catch (error) {
    pokemonName.textContent = 'NOT FOUND';
    pokemonInfo.textContent = 'Pokemon does not exist.';
    pokemonImage.src = '';
  }
});