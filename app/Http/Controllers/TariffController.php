<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTO\TariffDTO;
use App\Models\Tariff;
use App\Services\ValidationService;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    protected $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function getTariff(Request $request)
    {
        $validationResult = $this->validationService->validateTariffData($request);

        if ($validationResult) {
            return response()->json($validationResult, 400);
        }

        $tariffDTO = new TariffDTO(
            $request->input('name'),
            $request->input('price'),
            $request->input('validity_period'),
            $request->input('speed'),
            $request->input('type')
        );

        return response()->json([
            'name' => $tariffDTO->name,
            'price' => $tariffDTO->price,
            'validity_period' => $tariffDTO->validityPeriod,
            'speed' => $tariffDTO->speed,
            'type' => $tariffDTO->type,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tariffs = Tariff::all();
        return response()->json($tariffs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationResult = $this->validationService->validateTariffData($request);

        if ($validationResult) {
            return response()->json($validationResult, 400);
        }

        $tariff = Tariff::create($request->all());

        return response()->json($tariff);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tariff = Tariff::findOrFail($id);

        return response()->json($tariff);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validationResult = $this->validationService->validateTariffData($request);

        if ($validationResult) {
            return response()->json($validationResult, 400);
        }

        $tariff = Tariff::findOrFail($id);
        $tariff->update($request->all());

        return response()->json($tariff);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tariff = Tariff::find($id);
        $tariff->delete();

        return response()->json(['message' => 'Tariff deleted']);
    }
}
