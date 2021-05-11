#include <stdio.h>

int main() {
	int thang, nam, songay=0;
	printf("Nhap vao thang: ");
	scanf("%d", &thang);
	printf("Nhap vao nam: ");
	scanf("%d", &nam);
	int ngay31[7] = {1,3,5,7,8,10,12};
	int ngay30[4] = {4,6,9,11};
	for(int i=0;i<thang;i++) {
		if(thang == ngay31[i]){
			printf("31 ngay");
			break;
		}
		if(thang == ngay30[i]){
			printf("30 ngay");
			break;
		}
		else if((nam%4==0 || nam%1000==0) && nam%100!=0) {
			printf("29 ngay");
			break;
		}
		else {
			printf("28 ngay");
			break;
		}
	}
	return 0;
}
