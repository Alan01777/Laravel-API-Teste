<?php

namespace App\Repositories;

use App\Models\Pagamento;
use App\Repositories\Contracts\RepositoryInterface;
use App\Exceptions\NullValueException;

class PagamentoRepository implements RepositoryInterface
{
    private $pagamento;

    public function __construct(Pagamento $pagamento)
    {
        $this->pagamento = $pagamento;
    }

    public function findAll()
    {
        $pagamentos = $this->pagamento->with('consulta')->paginate(10);
        if ($pagamentos->total() === 0) {
            throw new NullValueException('No payment found');
        }
        return $pagamentos;
    }

    public function create($data)
    {
        return $this->pagamento->create($data);
    }

    public function find(int $id)
    {
        $pagamento = $this->pagamento->find($id);
        if ($pagamento === null) {
            throw new NullValueException('No payment found with id: ' . $id);
        }
        return $pagamento;
    }

    public function update($id, $data)
    {
        $pagamento = $this->find($id);
        $pagamento->update($data);
        return $pagamento;
    }

    public function delete($id)
    {
        $pagamento = $this->find($id);
        $pagamento->delete();
    }
}