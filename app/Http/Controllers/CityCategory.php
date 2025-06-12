<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityCategory extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    )
    {
        $this->cityRepository = $cityRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function show($lug){
        $city = $this->cityRepository->getCityBySlug($lug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($lug);

        return view('pages.city.show', compact('city', 'boardingHouses'));
    }
}
