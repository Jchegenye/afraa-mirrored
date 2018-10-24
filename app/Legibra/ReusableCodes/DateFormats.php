<?php 

namespace Afraa\Legibra\ReusableCodes;

{

    /**
     * Add your own custom date formats from here.
     *
     * @author Jackson A. Chegenye
     * @return dates
     */
    class DateFormats 
    {

        /**
         * List your date here
         * 
         * @author Jackson A. Chegenye
         * @return array
         **/
        public function date()
        {

            $date = array(

                'DateType1' => date('M d, Y'),
                'DateType2' => date('D, d-M-y H:i T'),
                'DateType3' => date('M,Y'),
                'DateType4' => date('Y-m-d-H:i:s')
                
            );

            return $date;
        }

    }
}