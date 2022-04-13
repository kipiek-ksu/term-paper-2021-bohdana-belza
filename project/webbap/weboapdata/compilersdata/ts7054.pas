program kv;
var
 a,b,c,d,x1,x2:real;    
R:string;
begin
 Read(a,b,c);
 D:=b*b-4*a*c;
 if D<0 
R:='NO ANSWER ';
 then Write(R);
 else begin
          d:=sqrt(d);
          x1:=(-b+d)/(2*a);
          x2:=(-b-d)/(2*a);
R='MANY ANSWER';
Write(R);
 Write(x1);
 Write(x2);
 end;   
end.