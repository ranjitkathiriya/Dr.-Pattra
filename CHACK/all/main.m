clc;
workspace;
close all;
opFolder = fullfile(cd);

A=imread('1c.jpg');
B=rgb2gray(A);
C=double(B);
for i=1:size(C,1)-2
    for j=1:size(C,2)-2
        %Sobel mask for x-direction:
        Gx=((2*C(i+2,j+1)+C(i+2,j)+C(i+2,j+2))-(2*C(i,j+1)+C(i,j)+C(i,j+2)));
        %Sobel mask for y-direction:
        Gy=((2*C(i+1,j+2)+C(i,j+2)+C(i+2,j+2))-(2*C(i+1,j)+C(i,j)+C(i+2,j)));
     
        %The gradient of the image
        %B(i,j)=abs(Gx)+abs(Gy);
        B(i,j)=sqrt(Gx.^2+Gy.^2);
     
    end
end

opFullFileName = fullfile(opFolder,'1c_1.jpg');
imwrite(B, opFullFileName,'jpg');

BW = imread('1c_1.jpg');
L = bwlabel(BW,8);
stats = regionprops(L,'EulerNumber');
x= [stats.EulerNumber];
ans=min(x);

if ans<=(-360) && ans>=(-372) || ans<=(-400) && ans>=(-419) || ans<=(-505) && ans>=(-510) || ans<=(-601) && ans>=(-603) || ans<=(-630) && ans>=(-637) || ans<=(-655) && ans>=(-665) || ans<=(-830) && ans>=(-895) || ans<=(-975) && ans>=(-990) || ans<=(-1020) && ans>=(-1080) 
    msgbox('Bacterial Leaf Spot');
    fileID = fopen('exp3.txt','w');
    fprintf(fileID,'%6s %12s\n','Bacterial Leaf Spot');
    fclose(fileID);
    
    
elseif ans<=(-420) && ans>=(-440) || ans<=(-452) && ans>=(-455) || ans<=(-515) && ans>=(-535) || ans<=(-560) && ans>=(-570) || ans<=(-600) && ans>=(-610) || ans<=(-755) && ans>=(-765) || ans<=(-795) && ans>=(-810) || ans<=(-1090) && ans>=(-1100)
        msgbox('Cercospora leaf spot');
        fileID = fopen('exp3.txt','w');
        printf(fileID,'%6s %12s\n','Cercospora leaf spot');
        fclose(fileID);
        
elseif ans<=(-373) && ans>=(-390) || ans<=(-445) && ans>=(-451) || ans<=(-500) && ans>=(-504) || ans<=(-540) && ans>=(-555) || ans<=(-574) && ans>=(-590) || ans<=(-612) && ans>=(-625) || ans<=(-638) && ans>=(-650) || ans<=(-1260) && ans>=(-1270)
        msgbox('flee beetle');
        fileID = fopen('exp4.txt','w');
        fprintf(fileID,'%6s %12s\n','flee beetle');
        fclose(fileID);
else
        msgbox(' Not recognized');
        fileID = fopen('exp.txt','w');
        printf(fileID,'%6s %12s\n','Not recognized');
        fclose(fileID);
end     
        imwrite(B,'image2.jpg');
        imwrite(A,'ima.jpg');
        delete 10b.jpg
       