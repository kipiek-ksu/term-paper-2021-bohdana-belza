Program pr13;
Var a, b, c: real; S1, S2, S3,R : string;
begin
read(a, b, c);
   if ((a>1) and (a<3)) then
      str(a:3:3,S1);
   if ((b>1) and (b<3)) then
      str(b:3:3,S2);
   if ((c>1) and (c<3)) then
      str(c:3:3,S3);
   R:=s1+s2++s3;
   writeln(R);
end.