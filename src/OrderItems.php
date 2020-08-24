<?php


namespace Kojirock5260\PayPayExample;


use PayPay\OpenPaymentAPI\Models\OrderItem;

class OrderItems
{
    /** @var OrderItem[] */
    private array $items;

    /**
     * @return array|OrderItem[]
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * @param string $name
     * @param int $quantity
     * @param int $amount
     * @throws \Exception
     */
    public function add(string $name, int $quantity, int $amount): void
    {
        $this->items[] = (new OrderItem())
            ->setName($name)
            ->setQuantity($quantity)
            ->setUnitPrice(['amount' => $amount, 'currency' => 'JPY']);
    }

    /**
     * @return int
     */
    public function total(): int
    {
        $result = 0;
        foreach ($this->items as $item) {
            $result += $item->getQuantity() * $item->getUnitPrice()['amount'];
        }

        return $result;
    }
}