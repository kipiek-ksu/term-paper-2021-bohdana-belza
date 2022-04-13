program p6_t10;
var s: String;
    i,k,Ans: Integer;
begin
 readln(s);
 i:=1;
 Ans:=0;
 While i<length(s) do
 begin
    k:=0;
    while s[i]<>',' do
    begin
     if s[i] = 'e' then inc(k);
     inc(i);
    end;
   If k=3 then inc(Ans);
   inc(i);
 end;
 write(Ans);
end.