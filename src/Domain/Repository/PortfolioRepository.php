<?php
declare(strict_types = 1);

namespace Agares\Info\Domain\Repository;

use Agares\Info\Domain\Portfolio;
use Agares\Info\Domain\PortfolioItem;
use Agares\MicroORM\EntityDefinitionCreator;
use Agares\MicroORM\QueryAdapter;

class PortfolioRepository
{
    /**
     * @var QueryAdapter
     */
    private $queryAdapter;

    /**
     * @var EntityDefinitionCreator
     */
    private $entityDefinitionCreator;

    public function __construct(QueryAdapter $queryAdapter, EntityDefinitionCreator $entityDefinitionCreator)
    {
        $this->queryAdapter = $queryAdapter;
        $this->entityDefinitionCreator = $entityDefinitionCreator;
    }

    public function getPortfolio() : Portfolio
    {
        $portfolioItems = $this->queryAdapter->executeQuery(
            'EXEC read_portfolio',
            $this->entityDefinitionCreator->create(PortfolioItem::class)
        );

        return new Portfolio($portfolioItems);
    }
}