#include "stdio.h"
#include "stdlib.h"
#include "complex.h"
#include "float.h"
#include "math.h"

typedef long double ld;
ld convertToPositive(ld number);
// Finding the L,C for a lossless Tx line
int main(int argc, char *argv[]) { // Z_0 beta omega
	ld Z_0;
	ld beta;
	ld omega;
	argc--;
	ld Cbar;
	ld Lbar;
	if(argc == 3) {
		Z_0 = convertToPositive(atof(argv[1]));
		beta = convertToPositive(atof(argv[2]));
		omega = convertToPositive(atof(argv[3]));
	} else {
		printf("Insuffiecient Args");
		return 0;
	}
	
	Cbar = beta / (omega*Z_0);
	Lbar = Z_0*Z_0*Cbar;
	printf("{");
printf("\"inputs\":{");
printf("\"w\":%.10LF,", omega);
printf("\"Beta\":%.10LF,", beta);
printf("\"omega\":%.10LF,", Z_0);
printf("},");
printf("\"outputs\":{");
printf("\"LBar\":%.10LF,", Lbar);
printf("\"CBar\":%.10LF,", Cbar);
printf("}");

printf("}");
	return 0;
}

ld convertToPositive(ld number) {
	return number >=0 ? number : -1*number;
}
