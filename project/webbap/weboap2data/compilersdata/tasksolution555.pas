program z1;
 var x,y:longint;
 procedure ch (n:longint; var k:longint);
   begin
   k:=0;
   while n<>0 do begin
                 k:=k*10+n mod 10;
                 n:=n div 10;
                 end;
   end;
 begin
 read(x);
 ch(x,y);
 if x=y then write('TRUE') else write('FALSE');
 end.
