<?php

namespace App\Http\Requests\Admin;

use App\Enums\RoomStatus;
use App\Enums\RoomType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Http\UploadedFile;

class AdminRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'type' => ['required', new Enum(RoomType::class)],
            'status' => ['required', new Enum(RoomStatus::class)],
            'price' => 'required|numeric',
            'image' => 'nullable',
        ];
    }

    public function prepareForValidation()
    {
        if($this->image) {
            $this->merge([
                'image' => new UploadedFile($this->createTempFile(base64_decode($this->image)), 'file'),
            ]);
        }
    }

    public function createTempFile($imageData)
    {
        $tmpFilePath = tempnam(sys_get_temp_dir(), 'image');
        $tmpFile = fopen($tmpFilePath, 'wb');
        fwrite($tmpFile, $imageData);
        fclose($tmpFile);
        return $tmpFilePath;
    }
}
