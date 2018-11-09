<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/|between:3,100',
            'cpf' =>  'required|digits:11',
            //'sexo' => ['required', Rule::in(['masculino', 'feminino']),],
            //'email' => 'required|email|unique:pessoas',
            'estado_id' => 'sometimes|nullable|integer',
            'cidade_id' => 'sometimes|nullable|integer',
            'profissao_id' => 'sometimes|nullable|integer',
        ];
    }
    
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.regex' => 'Insira um nome sem caracteres especiais',
            'nome.between' => 'Insira um nome entre 3 e 100 caracteres',
        ];
    }
}