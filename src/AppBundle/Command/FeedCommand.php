<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use AppBundle\Entity\Feed;

class FeedCommand extends ContainerAwareCommand{
	private $container;
	private $logger;
	private $output;

	protected function configure(){
		$this->setName('app:get-feeds')
		     ->setDescription('Get feeds from urls.')
			 ->setHelp('This command allows you to get feeds from given urls.')
			 ->addOption('urls', null, InputOption::VALUE_REQUIRED, 'urls for feed reader');
	}

	protected function execute(InputInterface $input, OutputInterface $output){
		$this->init($output);
		$this->getFeeds($input);
	}

	protected function init($output){
		$this->container = $this->getContainer()->get('doctrine')->getManager();
		$this->logger = $this->container->get('monolog.logger.feed');
		$this->output = $output;
	}

	protected function getFeeds($input){
		$this->output->writeln('===Start getting feeds: time'.date('Y-m-d H:i:s').'===');
		if(!empty($input->getOption('urls'))){
			$urls = explode(",", $input->getOption('urls'));
			foreach($urls as $url){
				try{
					$xml = simplexml_load_string(file_get_contents($url));
					$count = 0;
					if(isset($xml->channel->item)){
						$data = [];
						foreach($xml->channel->item as $item){
							$feed = new Feed();
							$feed->setTitle($item->title);
							$feed->setDescription($item->description);
							$feed->setLink($item->link);
							$category = !empty($item->category) ? $item->category : '';
							$feed->setCategory($category);
							$comments = !empty($item->comments) ? $item->comments : '';
							$feed->setComments($comments);
							$feed->setPubDate(new \DateTime($item->pub_date));
							$this->container->persist($feed);
							$count++;
						}
						$this->container->flush();
						$this->container->clear();
						$this->display($count.' feeds were saved.');
					}
				}catch(Exception $e){
					$this->display('Error: '.$e->getMessage());
				}
			}
		}else{
			$this->display('No urls found.');
		}
		$this->output->writeln('==End getting feeds: time'.date('Y-m-d H:i:s').'===');
	}

	protected function display($message){
		$this->output->writeln($message);
		$this->logger->info($message);
	}
}