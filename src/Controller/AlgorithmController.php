<?php
namespace App\Controller;

use App\Controller\AppController;

class AlgorithmController extends AppController
{
	
	public function round(){
		
		// �t�H�[������l���擾
		$roundNum = $this->request->data('roundNum');
		
		// ���f���Ƀ��W�b�N�����ČĂяo�����Ƃ������Adatabase�A�N�Z�X���Ă˂݂����ȃG���[���o�Ă����̂ŁA�Ƃ肠��������ĂȂ��ł��B�B
		// $this->loadModel('CalcurateAlgorithm');
		// $resultRound = $this->CalcurateAlgorithm->calcRound($roundNum);
		
		$resultRound;
		
		// �����_���ʂ̒l���擾
		$firstPoint = ($roundNum - (int) $roundNum) * 10;
		
		// �l�̌ܓ�����
		// �����_���ʂ�5��菬�����ꍇ�F�؂�̂āiint�ɃL���X�g�j
		// �����_���ʂ�5�ȏ�̏ꍇ�F�؂�グ����
		if ($firstPoint < 5) {
			$resultRound = (int) $roundNum;
		} else {
			$resultRound = (int) $roundNum + 1;
		}
		
		// view�Ɍ��ʂ𑗐M
		$this->set('resultRound', $resultRound);
    }
}