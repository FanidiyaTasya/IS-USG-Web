@extends('layouts.master')

@section('content')

<style>
  .card-custom {
    position: relative;
    overflow: hidden;
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), inset 0px 0px 15px rgba(255, 255, 255, 0.1);
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.6s;
  }

  .card-custom:hover {
    transform: scale(1.08) rotate(-1deg);
    box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.4);
  }

  .card-body-custom {
    display: flex;
    align-items: center;
    padding: 25px;
    position: relative;
    z-index: 1;
    transition: background 0.3s ease;
  }

  .card-icon {
    width: 80px;
    transition: transform 0.5s ease;
  }

  .card-icon:hover {
    transform: scale(1.2) rotate(15deg);
  }

  .card-text {
    color: #fff;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  }

  .card-text span {
    font-size: 1.1rem;
    font-weight: bold;
    letter-spacing: 0.5px;
    transition: color 0.3s ease;
  }

  .card-text h2 {
    font-size: 3rem;
    font-weight: 700;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .box-shape { border-radius: 8px; }  
  .oval-shape { border-radius: 100px; }  

  .bg-primary { background: linear-gradient(145deg, #5F6F52, #A9B388); }
  .bg-secondary { background: linear-gradient(145deg, #A9B388, #FEFAE0); }
  .bg-accent { background: linear-gradient(145deg, #FEFAE0, #5F6F52); }

  .card-custom::before {
    content: '';
    position: absolute;
    top: -100%;
    left: -100%;
    width: 300%;
    height: 300%;
    background: linear-gradient(60deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
    transform: rotate(45deg);
    transition: opacity 0.7s ease;
    opacity: 0;
    animation: shine 1.5s infinite linear;
  }

  .card-custom:hover::before {
    opacity: 1;
  }

  @keyframes shine {
    0% { transform: translate(-100%, -100%) rotate(45deg); }
    100% { transform: translate(100%, 100%) rotate(45deg); }
  }

  
  #yearSelect {
    padding: 10px 15px;
    font-size: 1rem;
    font-weight: 600;
    background-color: #f5f5f5;
    border-radius: 30px;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }

  #yearSelect:hover {
    background-color: #e1e1e1;
  }

  #yearSelect:focus {
    background-color: #d0d0d0;
    outline: none;
    box-shadow: 0px 0px 10px rgba(0, 123, 255, 0.6);
  }
</style>

<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-lg-4">
      <div class="card card-custom box-shape shadow-lg bg-primary">
        <div class="card-body card-body-custom">
          <img src="{{ asset('assets/images/sheep/sheep.png') }}" alt="Icon Domba" class="card-icon me-3">
          <div>
            <span class="card-text">JUMLAH DOMBA</span>
            <h2 class="mt-2 card-text">{{ $jumlahDomba }}</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-custom box-shape shadow-lg bg-secondary">
        <div class="card-body card-body-custom">
          <img src="{{ asset('assets/images/sheep/sheepman.png') }}" alt="Icon Domba Jantan" class="card-icon me-3">
          <div>
            <span class="card-text">DOMBA JANTAN</span>
            <h2 class="mt-2 card-text">{{ $jumlahDombaJantan }}</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card card-custom box-shape shadow-lg bg-accent">
        <div class="card-body card-body-custom">
          <img src="{{ asset('assets/images/sheep/sheepwoman.png') }}" alt="Icon Domba Betina" class="card-icon me-3">
          <div>
            <span class="card-text">DOMBA BETINA</span>
            <h2 class="mt-2 card-text">{{ $jumlahDombaBetina }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row mb-4">
    <div class="col-lg-12">
        <div class="card card-custom box-shape shadow-lg bg-primary">
            <div class="card-body position-relative">
                <div class="position-absolute top-0 end-0 p-3">
                    <select id="yearSelect" class="form-select form-select-lg shadow-lg border-primary rounded-pill bg-light border-0" style="transition: all 0.3s ease-in-out;">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                <canvas id="sheepChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('sheepChart').getContext('2d');
    

    const gradientHamil = ctx.createLinearGradient(0, 0, 0, 400);
    gradientHamil.addColorStop(0, 'rgba(54, 162, 235, 0.9)');
    gradientHamil.addColorStop(1, 'rgba(75, 192, 192, 0.5)');
  
    const gradientTidakHamil = ctx.createLinearGradient(0, 0, 0, 400);
    gradientTidakHamil.addColorStop(0, 'rgba(255, 99, 132, 0.9)');
    gradientTidakHamil.addColorStop(1, 'rgba(255, 159, 64, 0.5)');
  
    const sheepChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                    label: 'Jumlah Domba Hamil',
                    data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 8, 6],
                    backgroundColor: gradientHamil,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 10,
                    borderSkipped: false
                },
                {
                    label: 'Jumlah Domba Tidak Hamil',
                    data: [3, 4, 2, 1, 6, 5, 8, 7, 6, 5, 4, 3],
                    backgroundColor: gradientTidakHamil,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    borderRadius: 10,
                    borderSkipped: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#fff',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#fff',
                    borderWidth: 1,
                    cornerRadius: 6
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#fff',
                        font: {
                            size: 14
                        }
                    },
                    grid: {
                        color: '#ddd',
                        borderColor: '#ddd'
                    }
                },
                y: {
                    ticks: {
                        color: '#fff',
                        font: {
                            size: 14
                        }
                    },
                    grid: {
                        color: '#ddd',
                        borderColor: '#ddd'
                    }
                }
            }
        }
    });
  </script>

@endsection