<?php

namespace Brander\ContactUs\Model;

use Brander\ContactUs\Helper\CallBack;
use Brander\ContactUs\Api\GridInterface;
use Brander\ContactUs\Api\GridInterfaceFactory;
use Brander\ContactUs\Api\GridRepositoryInterface;
use Brander\ContactUs\Api\GridSearchResultInterface;
use Brander\ContactUs\Api\GridSearchResultInterfaceFactory;
use Brander\ContactUs\Model\ResourceModel\Grid as GridResource;
use Brander\ContactUs\Model\ResourceModel\Grid\Collection as GridCollection;
use Brander\ContactUs\Model\ResourceModel\Grid\CollectionFactory as GridCollectionFactory;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Class GridRepository
 *
 * @category    Brander
 * @package     Brander\ContactUs
 */
class GridRepository implements GridRepositoryInterface
{
    /**
     * @var array
     */
    private $registry = [];

    /**
     * @var CallBack
     */
    private $helper;

    /**
     * @var GridResource
     */
    private $callbackResource;

    /**
     * @var GridInterfaceFactory
     */
    private $callbackFactory;

    /**
     * @var GridCollectionFactory
     */
    private $callbackCollectionFactory;

    /**
     * @var GridSearchResultInterfaceFactory
     */
    private $callbackSearchResultFactory;

    /**
     * GridRepository constructor.
     *
     * @access  public
     * @param   GridInterfaceFactory                $callbackFactory
     * @param   GridResource                        $callbackResource
     * @param   GridCollectionFactory               $callbackCollectionFactory
     * @param   GridSearchResultInterfaceFactory    $callbackSearchResultFactory
     * @param   CallBack                            $helper
     */
    public function __construct(
        GridInterfaceFactory $callbackFactory,
        GridResource $callbackResource,
        GridCollectionFactory $callbackCollectionFactory,
        GridSearchResultInterfaceFactory $callbackSearchResultFactory,
        CallBack $helper
    ) {
        $this->callbackFactory = $callbackFactory;
        $this->callbackResource = $callbackResource;
        $this->callbackCollectionFactory = $callbackCollectionFactory;
        $this->callbackSearchResultFactory = $callbackSearchResultFactory;
        $this->helper = $helper;
    }

    /**
     * {@inheritdoc}
     */
    public function create( $data )
    {
        $message = '';
        try {
            if (strlen($data)) {
                $params = [];
                parse_str($data, $params);
                if (isset($params['form_key'])
                    && $this->helper->validateFormKey($params['form_key'])
                    && $this->helper->validateParams($params)
                ) {
                    unset($params['form_key']);
                    unset($params['hideit']);
                    $callback = $this->callbackFactory->create();
                    $callback->setData($params);
                    $this->save($callback);
                    $message = __('Form successfully submitted!!!');
                }

            } else {
                throw new NoSuchEntityException(__('Wrong or empty data was supplied!'));
            }

        } catch (NoSuchEntityException $e) {
            $message = $e->getMessage();
        } catch (LocalizedException $e) {
            $message = $e->getMessage();
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return $message->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function save( GridInterface $callback )
    {
        try {
            /** @var Grid $callback */
            $this->callbackResource->save($callback);
            $this->registry[$callback->getId()] = $this->get($callback->getId());
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Unable to save callback #%1', $callback->getId()));
        }

        return $this->registry[$callback->getId()];
    }

    /**
     * {@inheritdoc}
     */
    public function get( $id )
    {
        if (!array_key_exists($id, $this->registry)) {
            $callback = $this->callbackFactory->create();
            $this->callbackResource->load($callback, $id);
            if (!$callback->getId()) {
                throw new NoSuchEntityException(__('Requested callback does not exist'));
            }

            $this->registry[$id] = $callback;
        }

        return $this->registry[$id];
    }

    /**
     * {@inheritdoc}
     */
    public function getList( SearchCriteriaInterface $searchCriteria )
    {
        /** @var GridCollection $collection */
        $collection = $this->callbackCollectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }

        /** @var GridSearchResultInterface $searchResult */
        $searchResult = $this->callbackCollectionFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

    /**
     * {@inheritdoc}
     */
    public function delete( GridInterface $callback )
    {
        try {
            /** @var Grid $callback */
            $this->callbackResource->delete($callback);
            unset($this->registry[$callback->getId()]);
        } catch (\Exception $e) {
            throw new StateException(__('Unable to remove callback #%1', $callback->getId()));
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById( $id )
    {
        return $this->delete($this->get($id));
    }
}