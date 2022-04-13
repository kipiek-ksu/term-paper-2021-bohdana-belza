Program l_10_9;
var i,k,m:integer;st,a,s,p:string;
begin
read(st);
p:='b';write(length(st));
while  i<>length(st) do begin
       s:=copy(st,i,1);
       if (s<>' ') and (s<>',') and (s<>'.')
	  and (s<>':') and (s<>';') and (s<>'!')
	  and (s<>'?') then begin m:=m+1;a:=concat(a,s); end
       else begin if pos(p,a)>=1 then k:=k+1;i:=i+1;delete(a,m,1); end;
 end;
write(i,' ',k);
end.