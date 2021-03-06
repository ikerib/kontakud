<?php

namespace AppBundle\Repository;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;


/**
 * TramiteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TramiteRepository extends \Doctrine\ORM\EntityRepository
{
    public function topTramites( $f = null )
    {

        /** @var QueryBuilder $query */
        $query = $this->createQueryBuilder( 't' );

        $query->Select( 'COUNT(t.id) as zenbat' );
        $query->addSelect( 'm.name' );
        $query->innerJoin( 't.mota', 'm' );
        $query->addGroupBy( 't.mota' );

        if ( !empty( $f[ 'fIni' ] ) ) {
            $query->andWhere( 't.created >= :fini' )
                  ->setParameter( 'fini', $f[ 'fIni' ] );
        }
        if ( !empty( $f[ 'fFin' ] ) ) {
            $query->andWhere( 't.created <= :ffin' )
                  ->setParameter( 'ffin', $f[ 'fFin' ] );
        }
        return $query->getQuery()->getResult();

    }

    public function topZerbikat( $f = null )
    {

        /** @var QueryBuilder $query */
        $query = $this->createQueryBuilder( 't' );

        $query->Select( 'COUNT(t.kodea) as zenbat' );
        $query->addSelect( 't.kodea', 't.zerbikatid' );
        $query->innerJoin( 't.mota', 'm' );
        $query->andWhere( 'm.name=:zerbikat' );
        $query->setParameter( 'zerbikat', 'Zerbikat' );
        $query->addGroupBy( 't.kodea', 't.zerbikatid' );
        $query->orderBy( 'zenbat', 'desc' );
        $query->setMaxResults( 10 );

        if ( !empty( $f[ 'fIni' ] ) ) {
            $query->andWhere( 't.created >= :fini' )
                  ->setParameter( 'fini', $f[ 'fIni' ] );
        }
        if ( !empty( $f[ 'fFin' ] ) ) {
            $query->andWhere( 't.created <= :ffin' )
                  ->setParameter( 'ffin', $f[ 'fFin' ] );
        }
        return $query->getQuery()->getResult();

    }

    public function findAllGroupByMonth($f=null)
    {

        /** @var QueryBuilder $query */
        $query = $this->createQueryBuilder( 't' );
        $query->select( 'MONTH(t.created) as Hilabetea', 'COUNT(t.id) as Zenbat' );
        $query->groupBy( 'Hilabetea' );
        if ( !empty( $f[ 'fIni' ] ) ) {
            $query->andWhere( 't.created >= :fini' )
                  ->setParameter( 'fini', $f[ 'fIni' ] );
        }
        if ( !empty( $f[ 'fFin' ] ) ) {
            $query->andWhere( 't.created <= :ffin' )
                  ->setParameter( 'ffin', $f[ 'fFin' ] );
        }
        $query->andWhere( 'YEAR(t.created) = :urtea' );
        $query->setParameter( 'urtea', date( "Y" ) );


        return $query->getQuery()->getResult();
    }

    public function findAllByFilterForm( $f )
    {

        /** @var QueryBuilder $query */
        $query = $this->createQueryBuilder( 'a' );

        if ( !empty( $f[ 'fIni' ] ) ) {
            $query->andWhere( 'a.created >= :fini' )
                  ->setParameter( 'fini', $f[ 'fIni' ] );
        }
        if ( !empty( $f[ 'fFin' ] ) ) {
            $query->andWhere( 'a.created <= :ffin' )
                  ->setParameter( 'ffin', $f[ 'fFin' ] );
        }


        return $query->getQuery()->getResult();

    }
}
