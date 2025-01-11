<?php

namespace App\Http\Middleware;

use Closure;

class ConvertArabicNumerals
{
    public function handle($request, Closure $next)
    {
        // Access request data
        $requestData = $request->all();

        // Modify numeric data
        $this->modifyNumericData($requestData);

        // Update the request object with modified data
        $request->replace($requestData);

        // Proceed with the request
        return $next($request);
    }

    private function modifyNumericData(&$data)
    {
        // Iterate over each element of the data
        foreach ($data as $key => &$value) {
            // Check if the value is numeric
          
            if (is_numeric($value)) {
                // Change numeric value to 10
        
                $value = 10;
            } elseif (is_array($value)) {
                // If the value is an array, recursively modify its elements
                $this->modifyNumericData($value);
            }
        }
    }
}
